import mysql.connector

# host="mysql.cannabinoidsheal.com",
# user="steve_web",
# password="###Steve111",

host = "localhost"
user = "root"
password = ""

procurement_db = mysql.connector.connect(
    host=host,
    user=user,
    password=password,
    database="procurement_db"
)

ims_db_gh = mysql.connector.connect(
    host=host,
    user=user,
    password=password,
    database="ims_db_gh"
)

procurement_cursor = procurement_db.cursor(buffered=True)
ims_cursor = ims_db_gh.cursor(buffered=True)
