from sqlite3 import Timestamp
from time import sleep, time
import mysql.connector
from datetime import datetime

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
#     database="abl_gh_db"
# )

# ims_cursor = ims_db_gh.cursor(buffered=True)

def out(*args, in_production = False,**kwargs): None if in_production else print(*args, **kwargs)
# ===========================================================================================


items = ['Caps', 'Preform','Alcohol','Cellotape','Rubber', 'Packaging Bags Ginger','Tigernut']

from random import randrange,randint
from datetime import timedelta
def random_date(start, end):
    """
    This function will return a random datetime between two datetime 
    objects.
    """
    delta = end - start
    int_delta = (delta.days * 24 * 60 * 60) + delta.seconds
    random_second = randrange(int_delta)
    return start + timedelta(seconds=random_second)

count = 0

for _ in range(200):
    for item in items:
        # procurement_cursor.execute(f"SELECT closing FROM daily_usage WHERE item='{item}' ORDER BY id DESC LIMIT 1;")
        count+=1
        # for i in procurement_cursor.fetchone():
        d1 = datetime.strptime('1/1/2019 1:30 PM', '%m/%d/%Y %I:%M %p')
        d2 = datetime.strptime('1/1/2022 4:50 AM', '%m/%d/%Y %I:%M %p')
        opening = randint(100000,999999)
        closing = randint(1000,9999)
        timestamp = random_date(d1, d2)
        date = timestamp.strftime('%Y-%m-%d')
        out(count/7)
        # out(i)
        procurement_cursor.execute(f"INSERT INTO `daily_usage`(`item`,`opening`, `closing`, `date`, `timestamp`) VALUES ('{item}','{opening}', '{closing}', '{date}', '{timestamp}')")
        procurement.commit()


# print(opening)
# out(random_date(d1,d2))