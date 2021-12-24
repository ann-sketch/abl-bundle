import mysql.connector

procurement_db = mysql.connector.connect(
    host="64.111.99.177",
    user="mille",
    password="###Mille111",
)

procurement_cursor = procurement_db.cursor()

procurement_cursor.execute("SHOW DATABASES")