describe('Exercício 10 - Sistema de Monitoramento de Temperaturas Diária', () => {  
  beforeEach(() => {
    cy.visit('/exercicio10/');
  });

  it('Exibir o título da página, inputs e botão submit', () => {
    cy.contains('Registrar Temperatura Diária').should('be.visible');
    cy.get('#data').should('be.visible');
    cy.get('#temperatura').should('be.visible');
    cy.get('button[type="submit"]').should('be.visible')
  });

  it('Preencher data e temperatura', () => {
    cy.get('#data').type('2025-11-10');
    cy.get('#temperatura').type('23.5');
    cy.get('button[type="submit"]').click()
  });

it('Preencher data e temperatura', () => {
    cy.get('#data').type('2019-03-10');
    cy.get('#temperatura').type('30');
    cy.get('button[type="submit"]').click()
  });

});