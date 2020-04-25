package main

import (
	"github.com/go-chi/chi"
	"log"
	"net/http"
	"workshop_vrn/internal/handler"
)

func main() {
	h := handler.NewHandler()
	r := chi.NewRouter()
	r.Get("/hello", h.Hello)
	err := http.ListenAndServe(":8080", r)
	log.Fatal(err)
}
