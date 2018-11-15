import React, { Component } from 'react';
import styled from 'styled-components';

class App extends Component {

    constructor(props) {
        super(props)
        this.state = { dataSet: this.props.data }
    }

    render() {
        const Title = styled.h1`
        color: ${this.state.dataSet.color || "goldenrod"};
      `;
        return (
            <Title className={this.state.data.class}>{this.state.data.title}</Title>
        );
    }
}

export default App;