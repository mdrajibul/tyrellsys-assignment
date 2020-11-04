import React from 'react';
import { render, unmountComponentAtNode } from 'react-dom';
import { act } from 'react-dom/test-utils';
import CardList from './CardList';

let container: any = null;
beforeEach(() => {
  container = document.createElement('div');
  document.body.appendChild(container);
});

afterEach(() => {
  unmountComponentAtNode(container);
  container.remove();
  container = null;
});

it('renders distributed cards', async () => {
  const fakeCards = [
    ['D-K', 'D-A'],
    ['S-K', 'C-A']
  ];
  (jest.spyOn(global, 'fetch') as any).mockImplementation(() =>
    Promise.resolve({
      json: () => Promise.resolve(fakeCards)
    })
  );

  await act(async () => {
    render(<CardList noOfPlayer={2} />, container);
  });

  expect(container.querySelector('div:first-child').textContent).toBe('D-K,D-A');
  expect(container.querySelector('div:last-child').textContent).toBe('S-K,C-A');

  (global.fetch as any).mockRestore();
});
