FROM node:18


RUN apt-get update && apt-get install -y \
    vim \
    zip \
    unzip \
    curl
    
WORKDIR /var/www
CMD ["sh", "-c", "npm install && npm run dev -- --host"]
