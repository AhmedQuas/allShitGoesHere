from fastapi import FastAPI
from typing import Optional

#API documentation is accessible by /doc or /redoc path
app = FastAPI()

@app.get('/')
def index():
    return {'data':{'name':'Sarthak'}}

@app.get('/about')
def about():
    return {'data':{'about page'}}

#Query parameters
@app.get('/blog')
def blog(limit: int = 10, published: bool = True, sort: Optional[str] = None):
    if published:
        return {'data': f'{limit} published blogs from the db'}
    else:
        return {'data': f'{limit} all blogs from the db'}

#Path are processing from top to down
@app.get('/blog/unpublished')
def show_unpublished_posts():
    return {'data':{'unpublished'}}

@app.get('/blog/{id}')
def show_blog_post(id: int):
    #fetch posts with given id
    return {'data':{'post_id':id}}


@app.get('/blog/{id}/comments')
def show_blog_post_comments(id: str):
    #fetch comments from given post
    return {'data':{'1','2'}}
    