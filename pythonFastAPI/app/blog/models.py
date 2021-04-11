from sqlalchemy import Column, Integer, String
from .database import Base

class Blog(Base):
    __tablename__='blogs'

    id = Column(Integer, primary_key=True, index=True)
    title = Column(String(32))
    body = Column(String(32))

class User(Base):
    __tablename__='users'

    id = Column(Integer, primary_key=True, index=True)
    name = Column(String(32))
    email = Column(String(32))
    password = Column(String(256))