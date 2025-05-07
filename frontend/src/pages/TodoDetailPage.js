import React, { useState, useEffect } from 'react';
import { getTodoById, updateTodo } from '../api/todoApi'; // API'den veri al ve güncelle
import TodoForm from '../components/TodoForm'; // TodoForm bileşeni

const TodoDetailPage = ({ match }) => {
  const [todo, setTodo] = useState(null);
  const [error, setError] = useState(null);

  useEffect(() => {
    const fetchTodo = async () => {
      try {
        const response = await getTodoById(match.params.id); // ID'yi kullanarak todo'yu al
        setTodo(response.data);
      } catch (err) {
        setError(err.message);
      }
    };
    fetchTodo();
  }, [match.params.id]);

  const handleUpdateTodo = async (updatedTodo) => {
    try {
      await updateTodo(updatedTodo);
      alert('Todo güncellendi!');
    } catch (err) {
      alert('Hata: ' + err.message);
    }
  };

  return (
    <div className="todo-detail-container">
      {error && <p>Hata: {error}</p>}
      {todo ? (
        <TodoForm todo={todo} onSubmit={handleUpdateTodo} />
      ) : (
        <p>Todo bulunamadı.</p>
      )}
    </div>
  );
};

export default TodoDetailPage;
