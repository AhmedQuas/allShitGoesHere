from fastapi import FastAPI
from . import models
from .database import engine, get_db
from .routers import blog, user, authentication

app = FastAPI()

#Whenever we find some find any model we will create it on db
models.Base.metadata.create_all(engine)

app.include_router(blog.router)
app.include_router(user.router)
app.include_router(authentication.router)