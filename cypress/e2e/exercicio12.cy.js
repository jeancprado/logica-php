describe('Exercício 12 - Escada da motivação', () => {  
  beforeEach(() => {
    cy.visit('/exercicio12/');
  });

  it('Exibir o título da página, inputs e botão submit', () => {
    cy.contains('Escada de Motivação').should('be.visible');
    cy.get('input[name="goal"]').should('be.visible')
    cy.get('button[type="submit"]').should('be.visible')
    cy.contains('Histórico de Metas').should('be.visible');
    cy.contains('Meta').should('be.visible');
    cy.contains('Data e Hora').should('be.visible');

  });

  it('Adicionar palavra na escada de motivação', () => {
    cy.get('input[name="goal"]').type('Titans')
    cy.get('button[type="submit"]').click()
  });
  
    it('Adicionar palavra na escada de motivação', () => {
    cy.get('input[name="goal"]').type('Degrau')
    cy.get('button[type="submit"]').click()
  });

    it('Testar se a escada funciona conforme o esperado', () => {
    cy.get('input[name="goal"]').type('Agir')
    cy.get('button[type="submit"]').click()
    cy.contains('Agir').should('be.visible')
    cy.contains('Agir Agir').should('be.visible')
    cy.contains('Agir Agir Agir').should('be.visible')
    cy.contains('Agir Agir Agir Agir').should('be.visible')
  });
  
})