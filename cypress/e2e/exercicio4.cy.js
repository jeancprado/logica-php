describe('Exercício 4', () => {

  it('pagina do exercício 4', () => {
    cy.visit('/')
    cy.get('a[href="exercicio4/"]').click()
  })

 it('Deve exibir o título da página, inputs e botão de enviar', () => {
    cy.visit('/')
    cy.get('a[href="exercicio4/"]').click()
    cy.contains('h2', 'Boletim do Aluno').should('be.visible')
    cy.get('input[id="nota1"]').should('exist')
    cy.get('input[id="nota2"]').should('exist')
    cy.get('input[id="nota3"]').should('exist')
    cy.get('button[type="submit"]').contains('Enviar').should('exist')
  })

  it('Deve preencher os inputs com as notas, enviar e verificar o boletim para um aluno aprovado', () => {
    cy.visit('/')
    cy.get('a[href="exercicio4/"]').click()
    cy.get('#nota1').type('7')
    cy.get('#nota2').type('8')
    cy.get('#nota3').type('9')
    cy.get('button[type="submit"]').click()
    cy.contains('Notas em ordem crescente: 7, 8, 9')
    cy.contains(' Média das notas: 8,00').should('be.visible');
  });

  it('Deve preencher as notas, enviar e verificar o boletim para um aluno reprovado', () => {
    cy.visit('/')
    cy.get('a[href="exercicio4/"]').click()
    cy.get('#nota1').type('4')
    cy.get('#nota2').type('5')
    cy.get('#nota3').type('4')
    cy.get('button[type="submit"]').click()
    cy.contains('p', 'Notas em ordem crescente: 4, 4, 5').should('be.visible')
    cy.contains(' Média das notas: 4,33').should('be.visible')
  })

})
