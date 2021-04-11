from fastapi import APIRouter, Depends, status, Response, HTTPException
from .. import schemas, database, models, hashing
from sqlalchemy.orm import Session
from ..repository import user

router = APIRouter(
    tags = ['Authentication'],
    prefix = '/login'
)

get_db = database.get_db

@router.post('')
def login(request: schemas.Login, db: Session = Depends(get_db)):
    user = db.query(models.User).filter(models.User.email == request.username).first()
    
    if not(user and hashing.Hash.verify(user.password, request.password)):
        raise HTTPException(status_code = status.HTTP_404_NOT_FOUND,
            detail = 'Invalid credentials')
    
    # generate JWT token and return it
    
    return user