package main

import (
	"fmt"
)

func Concat(slices [][]int) []int {
	var result []int
	for _, s := range slices {
		result = append(result, s...)
	}
	return result
}

func main() {
	type pair struct {
		s [][]int
		r []int
	}
	test := []pair{
		{[][]int{{1, 2}, {3, 4}}, []int{1, 2, 3, 4}},
		{[][]int{{1, 2}, {3, 4}}, []int{1, 2, 3, 4}},
	}
	for _, t := range test {
		s := t.s
		r := t.r
		r2 := Concat(s)
		fmt.Printf("Test:%v\n", s)
		fmt.Printf("Expected:%v\n", r)
		fmt.Printf("Result:%v\n", r2)
	}
}
