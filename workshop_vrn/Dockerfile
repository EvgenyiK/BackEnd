FROM golang:1.13-alphine

WORKDIR /opt/code/
ADD .//opt/code/

RUN apk update && apk upgrade && \
    apk add --no-cashe git
RUN go mod download

RUN go build -o bin/workshop cmd/workshop/main.go