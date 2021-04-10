from sqlalchemy import create_engine
from sqlalchemy.ext.declarative import declarative_base
from sqlalchemy.orm import sessionmaker


db_url = 'mysql+pymysql://{user}:{passwd}@{db_host}/{dbname}?charset=utf8mb4'.format(
    user='exampleuser',
    passwd='some_secret_passwd',
    db_host='mariadb',
    dbname='exampledb'
    )

engine = create_engine(db_url)

sessionLocal = sessionmaker(autocommit=False, autoflush=False, bind=engine)

Base = declarative_base()