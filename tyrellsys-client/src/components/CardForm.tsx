import React, { useRef, useState, FormEvent } from 'react';
import { Button, CardWrapper, Form, Input } from './CardForm.styled';
import CardList from './CardList';

/**
 * Card form component. This component hold form and after
 * submit call card list component to show the distributed cards
 */
const CardForm = () => {
  const playerInput = useRef<HTMLInputElement>(null);

  const [noOfPlayer, setNoOfPlayer] = useState(-1);

  const submitForm = (ev: FormEvent) => {
    if (playerInput.current!.value) {
      setNoOfPlayer(parseInt(playerInput.current!.value));
    }
    ev.preventDefault();
  };

  const validateForm = () => {
    if (playerInput.current!.validity!.patternMismatch) {
      playerInput.current!.setCustomValidity('Please enter numeric value');
    } else {
      playerInput.current!.setCustomValidity('');
    }
  };

  return (
    <>
      <Form onSubmit={submitForm} onClick={validateForm}>
        <Input type="text" required pattern="\d*" placeholder="No of players" ref={playerInput} />
        <Button type="submit">Distribute</Button>
      </Form>
      <CardWrapper>
        <CardList noOfPlayer={noOfPlayer} />
      </CardWrapper>
    </>
  );
};

export default CardForm;
