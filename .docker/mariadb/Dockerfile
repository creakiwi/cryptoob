FROM yobasystems/alpine-mariadb:latest

ENV MYSQL_ROOT_PASSWORD=${MYSQL_ROOT_PASSWORD}
ENV MYSQL_DATABASE=${MYSQL_DATABASE}
ENV MYSQL_USER=${MYSQL_USER}
ENV MYSQL_PASSWORD=${MYSQL_PASSWORD}
ENV MYSQL_CHARSET=${MYSQL_CHARSET}
ENV MYSQL_COLLATION=${MYSQL_COLLATION}

# Copier des fichiers personnalisés ou des scripts d'initialisation SQL (si nécessaire)
#COPY ./my_custom_db.sql /docker-entrypoint-initdb.d/
