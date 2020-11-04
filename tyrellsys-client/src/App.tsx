import React from 'react';
import { Header, Main } from './App.styled';
import CardForm from './components/CardForm';

const App = () => {
  return (
    <Main>
      <Header>Playing cards</Header>
      <CardForm />
    </Main>
  );
};

export default App;
