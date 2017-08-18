#!/usr/bin/python
# e begoli, python connector for mysql
# import MySQL module
import MySQLdb


# connect



def SelectTable():
	db = MySQLdb.connect(host="localhost", user="root", passwd="123",
	db="WeatherStation")

	# create a database cursor
	cursor = db.cursor()

	# execute SQL select statement
	cursor.execute("SELECT * FROM MyGuests")

	# get the number of rows in the resultset
	numrows = int(cursor.rowcount)

	# get and display one row at a time
	for x in range(0,numrows):
		row = cursor.fetchone()
		print row[0], "-->", row[1],row[2],row[3]

 	return 
 	
#SelectTable()

