from typing import List
from fastapi import APIRouter, Depends, status, Response
from .. import schemas, database
from sqlalchemy.orm import Session
from ..repository import blog

router = APIRouter(
    tags = ['Blogs'],
    prefix = '/blog'
)

get_db = database.get_db

@router.post('', status_code = status.HTTP_201_CREATED)
def create(request: schemas.Blog, db: Session = Depends(get_db)):
    return blog.create(request, db)

@router.delete('/{id}', status_code = status.HTTP_204_NO_CONTENT)
def destroy_blog(id: int, db: Session = Depends(get_db)):
    return blog.destroy(id, db)

@router.put('/{id}', status_code = status.HTTP_202_ACCEPTED)
def update_blog(id: int, request: schemas.Blog, db: Session = Depends(get_db)):
    return blog.update(id, request, db)

@router.get('', response_model = List[schemas.ShowBlog])
def show_all_blogs(db: Session = Depends(get_db)):
    return blog.get_all(db)

@router.get('/{id}', status_code = status.HTTP_200_OK, response_model = schemas.ShowBlog)
def show_single_blog(id: int, response: Response ,db: Session = Depends(get_db)):
    return blog.show(id, response, db)

@router.get('/{id}/title', status_code = status.HTTP_200_OK, response_model = schemas.ShowBlogTitle)
def show_single_blog_title(id: int, response: Response ,db: Session = Depends(get_db)):
    return blog.show(id, response, db)