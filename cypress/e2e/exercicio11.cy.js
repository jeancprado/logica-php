describe('Exercício 11 - dez primeiros multiplos', () => {  
  beforeEach(() => {
    cy.visit('/exercicio11/');
  });

  it('Exibir o título da página, inputs e botão submit', () => {
    cy.contains('Dez Primeiros Múltiplos').should('be.visible');
    cy.contains('Digite qualquer número e ele será multiplicado do 1 ao 10').should('be.visible');
    cy.contains('Múltiplos Calculados').should('be.visible');
    cy.get('input[name="numero"]').should('be.visible')
    cy.get('button[type="submit"]').should('be.visible')
  });
  
  it('Calcular os dez primeiros múltiplos do número 2', () => {
    cy.get('input[name="numero"]').type(2);
    cy.get('button[type="submit"]').click();
    cy.contains('2 x 1 = 2').should('be.visible');
    cy.contains('2 x 2 = 4').should('be.visible');
    cy.contains('2 x 3 = 6').should('be.visible');
    cy.contains('2 x 4 = 8').should('be.visible');
    cy.contains('2 x 5 = 10').should('be.visible');
    cy.contains('2 x 6 = 12').should('be.visible');
    cy.contains('2 x 7 = 14').should('be.visible');
    cy.contains('2 x 8 = 16').should('be.visible');
    cy.contains('2 x 9 = 18').should('be.visible');
    cy.contains('2 x 10 = 20').should('be.visible');

  })

  it('Calcular os dez primeiros múltiplos do número 5', () => {
    cy.get('input[name="numero"]').type(5);
    cy.get('button[type="submit"]').click();
    cy.contains('Múltiplos Calculados').should('be.visible');
    cy.contains('5 x 1 = 5').should('be.visible');
    cy.contains('5 x 2 = 10').should('be.visible');
    cy.contains('5 x 3 = 15').should('be.visible');
    cy.contains('5 x 4 = 20').should('be.visible');
    cy.contains('5 x 5 = 25').should('be.visible');
    cy.contains('5 x 6 = 30').should('be.visible');
    cy.contains('5 x 7 = 35').should('be.visible');
    cy.contains('5 x 8 = 40').should('be.visible');
    cy.contains('5 x 9 = 45').should('be.visible');
    cy.contains('5 x 10 = 50').should('be.visible');
  });
  
})