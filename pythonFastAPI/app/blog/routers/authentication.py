from fastapi import APIRouter, Depends, status, Response, HTTPException
from fastapi.security import OAuth2PasswordRequestForm
from .. import schemas, database, models, hashing, token
from sqlalchemy.orm import Session
from ..repository import user
from datetime import timedelta

router = APIRouter(
    tags = ['Authentication'],
    prefix = '/login'
)

get_db = database.get_db

@router.post('')
def login(request: OAuth2PasswordRequestForm = Depends(), db: Session = Depends(get_db)):
    user = db.query(models.User).filter(models.User.email == request.username).first()
    
    if not(user and hashing.Hash.verify(user.password, request.password)):
        raise HTTPException(status_code = status.HTTP_404_NOT_FOUND,
            detail = 'Invalid credentials')
    
    access_token = token.create_access_token(data={"sub": user.email})
    return {"access_token": access_token, "token_type": "bearer"}