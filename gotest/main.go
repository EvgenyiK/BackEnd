package main

import "fmt"

type Adult interface {
	IsAdult() bool
	fmt.Stringer
}

type Person struct {
	age  int
	name string
}

func (m Person) String() string {
	return fmt.Sprintf("%s is %d", m.name, m.age)
}

func (m Person) IsAdult() bool {
	return m.age >= 18
}

func adultFilter(people []Adult) []Adult {
	adults := make([]Adult, 0)
	for _, p := range people {
		if p.IsAdult() {
			adults = append(adults, p)
		}
	}
	return adults
}

func main() {
	people := []Adult{Person{15, "John"}, Person{18, "Joe"}, Person{45, "Mory"}}
	fmt.Println(adultFilter(people))
}

//Joe is 18
