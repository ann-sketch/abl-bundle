from time import sleep
import mysql.connector

# ===========================================================================================
# CONFIG
# ===========================================================================================
procurement = mysql.connector.connect(
    host="localhost",
    user="root",
    password="",
    database="procurement_db"
)

procurement_cursor = procurement.cursor()

# ims_db_gh = mysql.connector.connect(
#     host="mysql.cannabinoidsheal.com",
#     user="steve_web",
#     password="###Steve111",
#     database="ims_dept_db_gh"
# )

# ims_cursor = ims_db_gh.cursor(buffered=True)

def out(*args, in_production = False,**kwargs): None if in_production else print(*args, **kwargs)
# ===========================================================================================


items = ['Caps', 'Preform','Alcohol','Cellotape','Rubber', 'Packaging Bags Ginger','Tigernut']

for item in items:
    procurement_cursor.execute(f"SELECT closing FROM daily_usage WHERE item='{item}' ORDER BY id DESC LIMIT 1;")

    

    for i in procurement_cursor.fetchone():
        sleep(1)
        out(i)
        procurement_cursor.execute(f"INSERT INTO `daily_usage`(`item`,`opening`) VALUES ('{item}','{i}')")
        procurement.commit()

