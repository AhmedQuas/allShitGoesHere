from typing import List
from fastapi import FastAPI, Depends, status, Response, HTTPException
from . import schemas, models
from .database import engine, sessionLocal
from sqlalchemy.orm import Session
from passlib.context import CryptContext
from .hashing import Hash

app = FastAPI()

#Whenever we find some find any model we will create it on db
models.Base.metadata.create_all(engine)

def get_db():
    db = sessionLocal()
    try:
        yield db
    finally:
        db.close()

@app.post('/blog', status_code = status.HTTP_201_CREATED, tags=['Blogs'])
def create(request: schemas.Blog, db: Session = Depends(get_db)):
    new_blog = models.Blog(title=request.title, body=request.body)
    db.add(new_blog)
    db.commit()
    db.refresh(new_blog)
    return new_blog

@app.delete('/blog/{id}', status_code = status.HTTP_204_NO_CONTENT, tags=['Blogs'])
def destroy_blog(id: int, db: Session = Depends(get_db)):
    blog = db.query(models.Blog).filter(models.Blog.id == id)

    if not blog.first():
        raise HTTPException(status_code = status.HTTP_404_NOT_FOUND,
            detail = f'Blog with id {id} not found')

    blog.delete(synchronize_session = False)
    db.commit()
    return 'done'

@app.put('/blog/{id}', status_code = status.HTTP_202_ACCEPTED, tags=['Blogs'])
def update_blog(id: int, request: schemas.Blog, db: Session = Depends(get_db)):
    blog = db.query(models.Blog).filter(models.Blog.id == id)
    
    if not blog.first():
        raise HTTPException(status_code = status.HTTP_404_NOT_FOUND,
            detail = f'Blog with id {id} not found')
    
    blog.update({
        'title': request.title,
        'body': request.body
    })
    db.commit()
    return 'updated'

@app.get('/blog', response_model = List[schemas.ShowBlog], tags=['Blogs'])
def show_all_blogs(db: Session = Depends(get_db)):
    blogs = db.query(models.Blog).all()
    return blogs

@app.get('/blog/{id}', status_code = status.HTTP_200_OK, response_model = schemas.ShowBlog, tags=['Blogs'])
def show_single_blog(id: int, response: Response ,db: Session = Depends(get_db)):
    blog = db.query(models.Blog).filter(models.Blog.id == id).first()
    
    if not blog:
        raise HTTPException(status_code = status.HTTP_404_NOT_FOUND, 
            detail = f'Blog with the id {id} is not avaiable')
        #response.status_code = status.HTTP_404_NOT_FOUND
        #return {'detail': f'Blog with the id {id} is not avaiable'}
    
    return blog

@app.get('/blog/{id}/title', status_code = status.HTTP_200_OK, response_model = schemas.ShowBlogTitle, tags=['Blogs'])
def show_single_blog_title(id: int, response: Response ,db: Session = Depends(get_db)):
    blog = db.query(models.Blog).filter(models.Blog.id == id).first()
    
    if not blog:
        raise HTTPException(status_code = status.HTTP_404_NOT_FOUND, 
            detail = f'Blog with the id {id} is not avaiable')
        #response.status_code = status.HTTP_404_NOT_FOUND
        #return {'detail': f'Blog with the id {id} is not avaiable'}
    
    return blog

@app.post('/user', status_code = status.HTTP_201_CREATED, response_model = schemas.ShowUser, tags=['Users'])
def create_user(request: schemas.User, db: Session = Depends(get_db)):
    new_user = models.User(
       name = request.name,
       email = request.email,
       password = Hash.bcrypt(request.password)
    )
    db.add(new_user)
    db.commit()
    db.refresh(new_user)
    return new_user

@app.get('/user/{id}', response_model = schemas.ShowUser, tags=['Users'])
def get_user(id: int, db: Session = Depends(get_db)):
    user = db.query(models.User).filter(models.User.id == id).first()

    if not user:
        raise HTTPException(status_code = status.HTTP_404_NOT_FOUND, 
            detail = f'User with the id {id} is not avaiable')

    return user