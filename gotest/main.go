package gotest

import (
	"fmt"
)

func itoa(i int) (s string) {
	negative := i < 0
	if negative {
		i = 0 - i
	}
	if i == 0 {
		return "0"
	}
	for i > 0 {
		tmp := i % 10
		i = i / 10
		s = string('0'+tmp) + s
	}
	if negative {
		s = "-" + s
	}
	return s
}

func main() {
	type pair struct {
		i int
		s string
	}
	test := []pair{
		{0, "0"},
		{22, "22"},
		{32432523, "32432523"},
		{-3, "-3"},
	}
}
