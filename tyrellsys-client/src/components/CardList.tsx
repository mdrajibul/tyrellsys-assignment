import React, { useEffect, useState } from 'react';
import { loadDistributedCard } from '../services/Card.Service';
import { ErrorWrapper } from './CardForm.styled';

/**
 * Show distributed card after getting data form api
 * @param props
 */
const CardList = (props: { noOfPlayer: number }) => {
  const [cardData, setCardData] = useState([]);
  const [errorText, setErrorText] = useState('');

  useEffect(() => {
    if (props.noOfPlayer > -1) {
      loadDistributedCard(props.noOfPlayer).then((cards: any) => {
        if (cards) {
          if (cards.error) {
            setErrorText(cards.error);
          } else {
            setCardData(cards);
            setErrorText('');
          }
        }
      });
    }
  }, [props.noOfPlayer, setErrorText, setCardData]);

  return (
    <>
      {errorText && <ErrorWrapper>{errorText}</ErrorWrapper>}
      {!errorText && cardData.map((data: any, idx: any) => <div key={idx}>{data.join(',')}</div>)}
    </>
  );
};

export default CardList;
