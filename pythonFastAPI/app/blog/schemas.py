from pydantic import BaseModel

#Model in pydantic is called schema
class Blog(BaseModel):
    title: str
    body: str

class ShowBlog(Blog):
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

    class Config():
        orm_mode = True