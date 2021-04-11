from sqlalchemy import Column, Integer, String, ForeignKey
from .database import Base
from sqlalchemy.orm import relationship

class Blog(Base):
    __tablename__='blogs'

    id = Column(Integer, primary_key=True, index=True)
    title = Column(String(32))
    body = Column(String(32))
    creator_id = Column(Integer, ForeignKey('users.id'))

    creator = relationship('User', back_populates='blogs')

class User(Base):
    __tablename__='users'

    id = Column(Integer, primary_key=True, index=True)
    name = Column(String(32))
    email = Column(String(32))
    password = Column(String(256))

    blogs = relationship('Blog', back_populates='creator')