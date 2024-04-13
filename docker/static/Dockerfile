FROM node:12-slim

WORKDIR /code
# ARG npmfile=.npmrc.dev

ADD package*.json ./
# ADD $npmfile ./.npmrc

RUN npm install

COPY . ./

ENTRYPOINT ["npm"]