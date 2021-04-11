from typing import List, Optional
from pydantic import BaseModel

#Model in pydantic is called schema
class BlogBase(BaseModel):
    title: str
    body: str

class Blog(BlogBase):
    class Config():
        orm_mode = True

class ShowBlogTitle(BaseModel):
    title: str

    class Config():
        orm_mode = True

class User(BaseModel):
    name: str
    email: str
    password: str

class ShowUser(BaseModel):
    name: str
    email: str
    blogs: List[Blog] = []

    class Config():
        orm_mode = True

class ShowBlogCreator(BaseModel):
    name: str
    email: str

    class Config():
        orm_mode = True

class ShowBlog(Blog):
    #creator: ShowUser
    creator: ShowBlogCreator

    class Config():
        orm_mode = True

class Login(BaseModel):
    username: str
    password: str

class Token(BaseModel):
    access_token: str
    token_type: str

class TokenData(BaseModel):
    username: Optional[str] = None