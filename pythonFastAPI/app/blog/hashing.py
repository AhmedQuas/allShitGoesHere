from passlib.context import CryptContext

pwd_cxt = CryptContext(schemes=['bcrypt'], deprecated = 'auto')

class Hash():
    def bcrypt(passwd: str):
        return pwd_cxt.hash(passwd)