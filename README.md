# AFD_SVM













# Application mobile
﻿<p align="center">
  <img src="https://github.com/ramizairi/Riguelni/assets/121579805/57a4c809-c301-4d75-ac7c-c9aac5626a7b" height="170" alt="auto_route_logo">
  <img src="https://github.com/ramizairi/Riguelni/assets/121579805/0db7fccb-3ce0-4180-a725-31a0a945ef9f" height="170" alt="auto_route_logo">
</p
<p align="center">
Open source app can help you to manage your daily tasks using AI
</p>

---

## Preview

|                                                          LOGIN INTERFACE                                                          |                                                        MANAGE TASKS EXEMPLE                                                        |                                                         CHAT WITH AI EXEMPLE                                                         |
| :------------------------------------------------------------------------------------------------------------------------------------------: | :-----------------------------------------------------------------------------------------------------------------------------------------: | :-----------------------------------------------------------------------------------------------------------------------------------------: |
| <img src='https://github.com/ramizairi/Riguelni/assets/121579805/79b34b94-fb3b-4cc5-bee3-60499c7e4297' height='600' width='300' /> | <img src='https://github.com/ramizairi/Riguelni/assets/121579805/8966e48d-c3cb-4ef8-81b2-0761436dd723' height='600' width='300'/> | <img src='https://github.com/ramizairi/Riguelni/assets/121579805/47df8894-b4ad-4db4-ba25-047f792b6fdc' height='600' width='300'/> |

# Riguelni

Welcome to **Riguelni** – your personal AI-powered task manager and chatbot! Riguelni is designed to help you manage your daily tasks efficiently and interact with an AI chatbot for any inquiries. Built using React Native and Expo, Riguelni aims to provide a seamless and intuitive user experience.

_______________________________________________
## Development
Riguelni leverages machine learning to optimize task management and provide accurate responses via the chatbot. The core AI functionality, particularly for generating daily plans, is powered by the Support Vector Machine (SVM) algorithm. Here’s an overview of how SVM is integrated into the app:

🚩**Data Collection**: 

  • The app collects user input related to tasks, including deadlines, priorities, and estimated durations.
  
🚩**Feature Extraction**: 

  • Relevant features are extracted from the input data to represent each task in a structured format.
  
🚩**Training the SVM Model**: A dataset comprising various task management scenarios is used to train the SVM model. This training process involves:

  • Defining the feature set (e.g., task priority, duration, deadline).
  
  • Training the SVM model to classify and rank tasks based on their importance and urgency.
  
🚩**Generating Plans:** 

  • When the user presses the Generate Plan button, the trained SVM model processes the input tasks and generates an optimized daily plan. The model prioritizes tasks and suggests an order of execution that maximizes productivity.
  
🚩**Chatbot Integration:** 

  • The AI chatbot is equipped with natural language processing capabilities to understand user queries and provide relevant responses. The SVM algorithm aids in understanding and classifying these queries for accurate responses.
  

## Features

- **AI-Powered Task Management**: Add your tasks and let our AI generate an optimized daily plan for you.
- **AI Chatbot**: Ask the AI chatbot anything, from general knowledge questions to specific inquiries about your tasks.
- **User-Friendly Interface**: A clean, easy-to-navigate interface built with React Native.
- **Cross-Platform**: Available on both iOS and Android devices.

## Table of Contents

- [Development](#development)
- [Features](#features)
- [Installation](#installation)
- [Usage](#usage)
- [Preview](#preview)
- [Contributing](#contributing)

## Installation

Follow these steps to set up Riguelni on your local machine.

### Prerequisites

- Node.js (>= 14.x)
- npm or yarn
- Expo CLI

### Clone the Repository

```bash
git clone https://github.com/ramizairi/Riguelni.git
cd Riguelni
```
## Install Dependencies

```Using npm
npm install
```

```Or using yarn
yarn install
```

```Start the Expo Server
expo start
```

## Usage

### Adding Tasks

  • Open the app and navigate to the Tasks section.
  
  • Enter your tasks for the day.
  
  • ress the Generate Plan button.
  
  • The AI will suggest an optimized daily plan based on your input.
  
### Chatting with the AI Chatbot

  • Navigate to the Chat section.
  
  • Type your question or request in the input field.
  
  • he AI chatbot will respond with helpful information or suggestions.

# Contributing

## We welcome contributions from the community! To contribute to Riguelni, follow these steps:

  • Fork the repository.
  
  • Create a new branch (git checkout -b feature-branch).
  
  • Make your changes and commit them (git commit -m 'Add new feature').
  
  • Push to the branch (git push origin feature-branch).
  
  • Create a pull request.
  
