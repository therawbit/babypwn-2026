#!/bin/bash

# VPS OPTIMIZATIONS:
# Prevents Ollama from trying to use more RAM than available
export OLLAMA_NUM_PARALLEL=1
export OLLAMA_MAX_LOADED_MODELS=1
# Limit CPU threads to avoid locking the VPS
export OLLAMA_LLM_LIBRARY=cpu_avx2 

# Start Ollama in the background
ollama serve &

# Wait for Ollama to initialize
echo "Waiting for the Poneglyph Guardian to wake up..."
until curl -s http://localhost:11434/api/tags > /dev/null; do
  sleep 2
done

# Start the Flask Web App
echo "Guardian is active. Starting web interface on port 5000..."
python3 app.py
