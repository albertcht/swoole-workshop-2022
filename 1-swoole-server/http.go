package main

import (
    "fmt"
    "io"
    "net/http"
)

func main() {
    fmt.Println("Server is starting...")
    http.HandleFunc("/", handle)
    http.ListenAndServe("0.0.0.0:9501", nil)
}

func handle(rw http.ResponseWriter, r *http.Request) {
    rw.Header().Set("Content-Type", "text/html")
    io.WriteString(rw, "Hello Go!")
}
