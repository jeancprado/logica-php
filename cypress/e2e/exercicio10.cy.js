describe('Exercício 10 - Sistema de Monitoramento de Temperaturas Diária', () => {  
  beforeEach(() => {
    cy.visit('/exercicio10/');
  });

  it('Exibir o título da página, inputs e botão submit', () => {
    cy.contains('Registrar Temperatura Diária').should('be.visible');
    cy.get('#measurement_date').should('be.visible');
    cy.get('#temperature_recorded').should('be.visible');
    cy.get('button[type="submit"]').should('be.visible')
  });

  it('Exibir o segundo bloco com informações de registro, média geral e classificação das temperaturas', () => {
      cy.contains('Resumo Estatístico').should('be.visible');
      cy.contains('Média Geral:').should('be.visible');
      cy.contains('Temperaturas Baixas (< 15°C):').should('be.visible');
      cy.contains('Temperaturas Normais (15–25°C):').should('be.visible');
      cy.contains('Temperaturas Altas (> 25°C):').should('be.visible');
    })

  it('Preencher data e temperatura', () => {
    cy.get('#measurement_date').type('2025-01-12');
    cy.get('#temperature_recorded').type('24');
    cy.get('button[type="submit"]').click()
  });

  it('Preencher data e temperatura', () => {
    cy.get('#measurement_date').type('2019-03-10');
    cy.get('#temperature_recorded').type('30');
    cy.get('button[type="submit"]').click()
  });

  it('Exibir o Histórico de Temperaturas', () => {
    cy.contains('Histórico de Temperaturas').should('be.visible');
    cy.contains('12/01/2025'), ('24.0°C'), ('Normal')
    cy.contains('10/03/2019'), ('30.0°C'), ('Alta')
  })
  
});

