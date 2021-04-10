from fastapi import FastAPI
from . import schemas
from .database import engine

app = FastAPI()

@app.post('/blog')
def create(request: schemas.Blog):
    return request