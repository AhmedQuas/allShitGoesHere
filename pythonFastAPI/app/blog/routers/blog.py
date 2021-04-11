from typing import List
from fastapi import APIRouter, Depends, status, Response ,HTTPException
from .. import schemas, database, models
from sqlalchemy.orm import Session

router = APIRouter()

get_db = database.get_db

@router.post('/blog', status_code = status.HTTP_201_CREATED, tags=['Blogs'])
def create(request: schemas.Blog, db: Session = Depends(get_db)):
    new_blog = models.Blog(title = request.title, body = request.body, creator_id = 1)
    db.add(new_blog)
    db.commit()
    db.refresh(new_blog)
    return new_blog

@router.delete('/blog/{id}', status_code = status.HTTP_204_NO_CONTENT, tags=['Blogs'])
def destroy_blog(id: int, db: Session = Depends(get_db)):
    blog = db.query(models.Blog).filter(models.Blog.id == id)

    if not blog.first():
        raise HTTPException(status_code = status.HTTP_404_NOT_FOUND,
            detail = f'Blog with id {id} not found')

    blog.delete(synchronize_session = False)
    db.commit()
    return 'done'

@router.put('/blog/{id}', status_code = status.HTTP_202_ACCEPTED, tags=['Blogs'])
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

@router.get('/blog', response_model = List[schemas.ShowBlog], tags=['Blogs'])
def show_all_blogs(db: Session = Depends(get_db)):
    blogs = db.query(models.Blog).all()
    return blogs

@router.get('/blog/{id}', status_code = status.HTTP_200_OK, response_model = schemas.ShowBlog, tags=['Blogs'])
def show_single_blog(id: int, response: Response ,db: Session = Depends(get_db)):
    blog = db.query(models.Blog).filter(models.Blog.id == id).first()
    
    if not blog:
        raise HTTPException(status_code = status.HTTP_404_NOT_FOUND, 
            detail = f'Blog with the id {id} is not avaiable')
        #response.status_code = status.HTTP_404_NOT_FOUND
        #return {'detail': f'Blog with the id {id} is not avaiable'}
    
    return blog

@router.get('/blog/{id}/title', status_code = status.HTTP_200_OK, response_model = schemas.ShowBlogTitle, tags=['Blogs'])
def show_single_blog_title(id: int, response: Response ,db: Session = Depends(get_db)):
    blog = db.query(models.Blog).filter(models.Blog.id == id).first()
    
    if not blog:
        raise HTTPException(status_code = status.HTTP_404_NOT_FOUND, 
            detail = f'Blog with the id {id} is not avaiable')
        #response.status_code = status.HTTP_404_NOT_FOUND
        #return {'detail': f'Blog with the id {id} is not avaiable'}
    
    return blog