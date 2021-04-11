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