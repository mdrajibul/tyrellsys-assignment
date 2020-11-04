import styled from 'styled-components';

export const Input = styled.input`
  font-size: 18px;
  padding: 10px 10px 10px 5px;
  display: block;
  width: 50%;
  border: none;
  border-bottom: 1px solid #757575;
  &:focus {
    outline: none;
  }
`;

export const Button = styled.button`
  padding: 6px 10px;
  overflow: hidden;
  border-width: 0;
  outline: none;
  border-radius: 2px;
  box-shadow: 0 1px 4px rgba(0, 0, 0, 0.6);
  background-color: #2ecc71;
  color: #ecf0f1;
  transition: background-color 0.3s;

  &:hover,
  &:focus {
    background-color: #27ae60;
  }
`;

export const Form = styled.form`
  padding: 10px;
  text-align: center;
  margin: 10px;
  border-bottom: 1px solid #cccccc;
  > * {
    display: inline-block;
    margin-right: 10px;
  }
`;

export const CardWrapper = styled.div`
  padding: 20px;
  text-align: left;
`;

export const ErrorWrapper = styled.div`
  text-align: center;
  font-size: 14px;
  color: #ff0000;
  padding: 10px;
`;
