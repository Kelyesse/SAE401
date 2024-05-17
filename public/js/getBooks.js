const BOOK_CONTROLLER_URL = "/api/books";

const fetchBooks = async () => {
    const response = await fetch(BOOK_CONTROLLER_URL);
    const data = await response.json();
    return data;
};
