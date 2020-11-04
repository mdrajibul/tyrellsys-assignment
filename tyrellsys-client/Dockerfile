FROM node:12

WORKDIR /project/tyrellsys-assignment/tyrellsys-client

COPY . ./

RUN npm install && \
    npm run build

CMD [ "node", "./run.js" ]

EXPOSE 3000
