describe('Exercício 11 - dez primeiros multiplos', () => {  
  beforeEach(() => {
    cy.visit('/exercicio11/');
  });

  it('Exibir o título da página, inputs e botão submit', () => {
    cy.contains('Dez Primeiros Múltiplos').should('be.visible');
    cy.get('input[name="numero"]').should('be.visible')
    cy.get('button[type="submit"]').should('be.visible')
  });
  
})