package handler

import (
	"fmt"
	"net/http"
)

type Handler struct {

}

func NewHandler() *NewHandler{
	return &Handler{}
}

func(h*Handler) (w http.ResponseWriter, r*http.Request)  {
	fmt.Printf(w,"hello golang Voronezh")
}