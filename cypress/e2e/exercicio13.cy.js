describe ('Exercício 13 - Classificação de Temperatura', () => {
    beforeEach(() => { 
        cy.visit('/exercicio13/');
    });

    it('Exibir o título da página, input e botão submit', () => {
        cy.contains('Controle de Temperaturas').should('be.visible');
        cy.get('input[name="temperature"]').should('be.visible');
        cy.get('button[type="submit"]').should('be.visible');
        cy.contains('(Digite "999" para encerrar)').should('be.visible');
        cy.contains('Fria: abaixo de 15°C').should('be.visible');
        cy.contains('Agradável: 15°C até 30°C').should('be.visible');
        cy.contains('Quente: acima de 30°C').should('be.visible');
    });

});