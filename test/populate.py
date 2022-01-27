import mysql.connector

items = ["Adonko 123 (Bottle)","Adonko Bitters (Bottle)","Adonko Bitters (Roll)","Adonko 123 (Roll)","Adonko Atadwe Ginger (Bottle)","Adonko Dry Gin (Roll)","Adonko 2 Fingers (Roll)"]


host = "localhost"
user = "root"
password = ""

ims_products_db_gh = mysql.connector.connect(
    host=host,
    user=user,
    password=password,
    database="ims_products_db_gh"
)


from random import randint, randrange
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

from datetime import datetime

d1 = datetime.strptime('1/1/2019 1:30 PM', '%m/%d/%Y %I:%M %p')
d2 = datetime.strptime('1/1/2022 4:50 AM', '%m/%d/%Y %I:%M %p')

# print(random_date(d1, d2))


ims_products_db_gh_cursor = ims_products_db_gh.cursor()

count = 0
for x in range(200):
    for i  in items:
        open = randint(99999,999999)
        close = randint(1111,55555)
        date = str(random_date(d1, d2))[:9]
        ims_products_db_gh_cursor.execute("INSERT INTO daily_usage (item, opening, closing, date, timestamp) VALUES (%s, %s, %s, %s, %s)", (i, open, close, date, random_date(d1, d2)))
    count += 1
    print(count//2)
ims_products_db_gh.commit()
print("Done")