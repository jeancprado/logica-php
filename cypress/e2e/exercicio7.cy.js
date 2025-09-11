describe('Exercício 7', () => {
  
  it('Deve gerar recibo correto para cliente VIP', () => {
    cy.visit('localhost')
    cy.visit('localhost/exercicio7/')
    cy.get('input[name="equipamento"]').type('Raquete de Tênis')
    cy.get('input[name="tipo_cliente"][value="VIP"]').check()
    cy.get('button[type="submit"]').click()
    cy.contains('Recibo de Aluguel').should('be.visible')
    cy.contains('Equipamento: Raquete de Tênis').should('be.visible')
    cy.contains('Cliente: VIP').should('be.visible')
    cy.contains('Prazo para devolução: 7 dias').should('be.visible')
  })

  it('Deve gerar recibo correto para cliente Comum', () => {
    cy.get('input[name="equipamento"]').type('Bola de Futebol')
    cy.get('input[name="tipo_cliente"][value="Comum"]').check()
    cy.get('button[type="submit"]').click()
    cy.contains('Recibo de Aluguel').should('be.visible')
    cy.contains('Equipamento: Bola de Futebol').should('be.visible')
    cy.contains('Cliente: Comum').should('be.visible')
    cy.contains('Prazo para devolução: 2 dias').should('be.visible')
  })

})