#include <Wire.h> 
#include <SFE_BMP180.h> 
#include <SoftwareSerial.h>
#include <DHT.h>
#include <string.h>
#include <Servo.h> 

#define ALTITUDE 477.37
#define DHTPIN 2    
#define DHTTYPE DHT22   // DHT 22  (AM2302)


SoftwareSerial mySerial(9, 10);
int trigPin = 11;    
int echoPin = 12; 
float duration, distance;
int servoPin = 8;
Servo servo;  
int angle = 0;   // servo position in degrees 
int WaterCount=0;

char msg;
char call;
const int WaterLevalPin= 0;
int liquid_level;
SFE_BMP180 pressure;
int chk;
float hum;  //Stores humidity value
float temp; //Stores temperature value

String tmp;
String Hum;
String Rainfall;
String pressur;

String mgs,mgs1;
DHT dht(DHTPIN, DHTTYPE); // Initialize DHT sensor for normal 16mhz Arduino


void setup()
{
  servo.attach(servoPin); 
  pinMode(trigPin, OUTPUT);
  pinMode(echoPin, INPUT);
  UpSideRotate();
  mySerial.begin(9600);   // Setting the baud rate of GSM Module  
  Serial.begin(9600);    // Setting the baud rate of Serial Monitor (Arduino)
  
  if (pressure.begin()){ //If initialization was successful, continue
    Serial.println("BMP180 init success");
  }
  else{ //Else, stop code forever
    Serial.println("BMP180 init fail");
    while (1);
  }
  delay(100);
  dht.begin();
}

void loop()
{  
  
      Rainfall = getRainFall();
      Rainfall = Split(Rainfall);
      pressur = getAtomPressure();
      tmp = getTemperature();
      tmp = Split(tmp);
      Hum = getHumidity();
      Hum = Split(Hum);
      Serial.println("Rainfall");
      Serial.println(Rainfall);
      Serial.println("pressure");
      Serial.println(pressur);
      Serial.println("temperature");
      Serial.println(tmp);
      Serial.println("humidity");
      Serial.println(Hum);
      Serial.println("mgs");
      
      mgs = Rainfall + "/"+ tmp + "/"+ Hum + "/" + pressur;
      mgs = Split(mgs);
      Serial.println(mgs);
      
     SendMessage(mgs);
     
  
     if (mySerial.available()>0)
         Serial.write(mySerial.read());
         delay(7000);
}

void SendMessage(String mgs){
  mySerial.println("AT+CMGF=1");    //Sets the GSM Module in Text Mode
  delay(1000);  // Delay of 1000 milli seconds or 1 second
  mySerial.println("AT+CMGS=\"+94711905761\"\r"); // Replace x with mobile number
  delay(1000);
  mySerial.println(mgs);// The SMS text you want to send
  delay(100);
  mySerial.println((char)26);// ASCII code of CTRL+Z
  delay(1000);
}

void ReceiveMessage(){
  mySerial.println("AT+CNMI=2,2,0,0,0"); // AT Command to recieve a live SMS
  delay(1000);
  if (mySerial.available()>0)
  {
    msg=mySerial.read();
    Serial.print(msg);
  }
}

String getAtomPressure(){
char status;
double T, P, p0;
status = pressure.startTemperature();
  if (status != 0) {
    delay(status);
    status = pressure.getTemperature(T);
    if (status != 0) {
      status = pressure.startPressure(3);
      if (status != 0) {
        delay(status);
        status = pressure.getPressure(P, T);
        if (status != 0) {
          p0 = pressure.sealevel(P, ALTITUDE);
          String pressure = FloatToString(P/10.0);
          return pressure;
        }
      }
    }
  }
return "0.0";
}

String getTemperature(){
    
    temp= dht.readTemperature();
    String temperature = FloatToString(temp);  
    return temperature;
}

String getHumidity(){
    char array[20];
    hum = dht.readHumidity();
    String humidity = FloatToString(hum); 
    return humidity;
}

String FloatToString(double floatVal){
    //double floatVal=1.2;
    char charVal[10];          //temporarily holds data from vals 
    String stringVal = "";     //data on buff is copied to this string
    
    dtostrf(floatVal, 4, 4, charVal);  //4 is mininum width, 4 is precision; float value is copied onto buff
    
    for(int i=0;i<sizeof(charVal);i++){
      stringVal+=charVal[i];
    }
    
    return stringVal;
}

String Split(String str){
 
    char *record = const_cast<char*>(str.c_str());
    char *p;
    p = strtok(record," ");
    return p;
}


float getWterLeval(){
  digitalWrite(trigPin, LOW);
  delayMicroseconds(5);
  digitalWrite(trigPin, HIGH);
  delayMicroseconds(10);
  digitalWrite(trigPin, LOW);
  
  pinMode(echoPin, INPUT);
  duration = pulseIn(echoPin, HIGH);
  distance = ((duration/2) / 29.1)*10;// convert the time into a distance
  return distance;
}

String getRainFall(){
  float count =0;
  for(int i =0;i<10;i++){
    digitalWrite(trigPin, LOW);
    delayMicroseconds(2);
    digitalWrite(trigPin, HIGH);
    delayMicroseconds(5);
    digitalWrite(trigPin, LOW);
    
    pinMode(echoPin, INPUT);
    digitalWrite(trigPin, HIGH); // Turn on pullup resistor
    duration = pulseIn(echoPin, HIGH);
    distance = ((duration/2) / 29.1)*10;// convert the time into a distance
    count+=distance;
    Serial.println(distance);
    delay(10);
  }
  String rainfall = FloatToString(400-(count/10));
  return rainfall;
}

void DownSideRotate(){

    for(angle = 0; angle < 90; angle++){  // scan from 0 to 180 degrees
                                      
      servo.write(angle);               
      delay(15);                   
    }
}

void UpSideRotate(){
  
    for(angle = 90; angle > 0; angle--){  //  scan from 180 to 0 degrees                              
      servo.write(angle);           
      delay(15);       
    } 
}


void RemoveWater(){
    for(angle = 0; angle < 90; angle++)  
    {                                  
      servo.write(angle);               
      delay(15);                   
    } 
    delay(5000);
    
    for(angle = 90; angle > 0; angle--)    
    {                                
      servo.write(angle);           
      delay(15);       
    } 
}



