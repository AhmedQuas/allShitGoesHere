from passlib.context import CryptContext

pwd_cxt = CryptContext(schemes=['bcrypt'], deprecated = 'auto')

class Hash():
    def bcrypt(passwd: str):
        return pwd_cxt.hash(passwd)
    
    def verify(hashed_passwd, plain_passwd):
        return pwd_cxt.verify(plain_passwd, hashed_passwd)