describe('Exercício 12 - Escada da motivação', () => {  
  beforeEach(() => {
    cy.visit('/exercicio12/');
  });

  it('Exibir o título da página, inputs e botão submit', () => {
    cy.contains('Escada de Motivação').should('be.visible');
    cy.get('input[name="meta"]').should('be.visible')
    cy.get('button[type="submit"]').should('be.visible')
  });
  
})