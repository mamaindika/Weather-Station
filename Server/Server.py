import socket
import sys
from thread import *
from Mysql import  SelectTable
from MysqlInsert import InsertTable

HOST = ''   
PORT = 6000

s = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
print 'Socket created'

try:
    s.bind((HOST, PORT))
except socket.error , msg:
    print 'Bind failed. Error Code : ' + str(msg[0]) + ' Message ' + msg[1]
    sys.exit()

print 'Socket bind complete'

s.listen(10)
print 'Socket now listening'

def clientthread(conn):
    #Sending message to connected client
    conn.send('Welcome to the server. Receving Data...\n')

    #infinite loop so that function do not terminate and thread do not end.
    while True:

        #Receiving from client
        data = conn.recv(1024)
        stringdata = data.decode('utf-8')
        print len(stringdata)
        reply = 'Message Received at the server!\n'
        #InsertTable("03.25.12#12/04/2017#29.3330#81.3245#967.7570#23.3243#78.234#East")
        if len(stringdata) > 50:
            InsertTable(stringdata);
            print data
            if not data:
                break

        conn.sendall(reply)

    conn.close()

#now keep talking with the client
while 1:
    #wait to accept a connection
    conn, addr = s.accept()
    print 'Connected with ' + addr[0] + ':' + str(addr[1])

    #start new thread
    start_new_thread(clientthread ,(conn,))

s.close()

